<?php

$from->userObj->setBackground($data->data->value->user->background);
$from->userObj->save();

WindowQuery::create()->filterByUserId($from->user['id'])->delete();

foreach ($data->data->value->windows->list as $w) {
    if($w) {
        $win = new Window();
        $win->setWidth($w->width);
        $win->setHeight($w->height);
        $win->setLeft($w->left);
        $win->setTop($w->top);
        $win->setTitle($w->title);
        $win->setSrc($w->src);
        $win->setIcon($w->icon);
        $win->setUserId($from->user['id']);
        $win->save();
    }

}

LabelQuery::create()->filterByUserId($from->user['id'])->delete();

foreach ($data->data->value->labels as $l) {
    if($l) {
        $label = new Label();
        $label->setLeft($l->left);
        $label->setTop($l->top);
        $label->setTitle($l->title);
        $label->setIcon($l->icon);
        $label->setAppId($l->appid);
        $label->setUserId($from->user['id']);
        $label->save();
    }

}

$from->send(json_encode([
            'callback' => $data->callback,
            'status' => 'ok',
            'data' => []
])); 