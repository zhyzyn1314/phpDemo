<?php

class Comment
{
    private $data = array();

    function __construct($data)
    {
        $this->data = $data;
    }

    public static function validate(&$arr)
    {
        if (!($data['username'] = filter_input(INPUT_POST, 'username', FILTER_CALLBACK, array('options' => 'Comment::validate_str')))) {
            $error['username'] = '请输入合法用户名';
        }
        $options = array(
            'options' => array(
                'min_range' => 1,
                'max_range' => 5
            )
        );
        if (!($data['face'] = filter_input(INPUT_POST, 'face', FILTER_VALIDATE_INT, $options))) {
            $error['face'] = '请选择合法头像';
        }
        if (!($data['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
            $error['email'] = '请输入正确邮箱';
        }
        if (!($data['url'] = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL))) {
            $data['url'] = '';
        }
        if (!($data['content'] = filter_input(INPUT_POST, 'content', FILTER_CALLBACK, array('options' => 'Comment::validate_str')))) {
            $error['content'] = '请输入合法内容';
        }
        if (!empty($error)) {
            $arr = $error;
            return false;
        }
        $arr = $data;
        $arr['email'] = strtolower(trim($arr['email']));
        return true;
    }

    public static function validate_str($str)
    {
        if (mb_strlen($str, 'UTF8') < 1) {
            return false;
        }
        $str = nl2br(htmlspecialchars($str, ENT_QUOTES));
        return $str;
    }

    public function output()
    {
        $link_start = '';
        $link_end = '';
        if ($this->data['url']) {
            $link_start = "<a href='" . $this->data['url'] . "' target='_blank'>";
            $link_end = "</a>";
        }

        $dateStr = date("Y年m月d日 H:i:s", $this->data['pubTime']);
        $res = <<<EOF
            <div class='comment'>
                <div class='face'>
                    {$link_start}
                    <img src='img/{$this->data['face']}.jpg' width='50' height='50' />
                    {$link_end}
                </div>
                <div class='username'>
                    {$link_start}
                    {$this->data['username']}
                    {$link_end}
                </div>
                <div class='date' title='发布于{$dateStr}'>
                    {$dateStr}
                </div>
                <p>{$this->data['content']}</p>
            </div>
EOF;
        return $res;
    }

}
