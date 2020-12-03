<?php
    class comment
    {
        public $author_id = -1;
        public $comment_id = -1;
        public $text = "";

        function __construct($author_id, $comment_id, $text) {
            $this->author_id = $author_id;
            $this->comment_id = $comment_id;
            $this->text = $text;
        }

        function get_email(){
            return "gim@gmail.com";
        }

        function get_replies()
        {
            return $this;
            // echo "Get by comment id"; 
        }
    }

    function post_comment($user_id, $post_id, $text){
        echo 'post comment'.$post_id.$text;
    }

    
    function post_reply($user_id, $comment_id, $text){
        echo 'post reply'.$comment_id.$text;
    }

?>
