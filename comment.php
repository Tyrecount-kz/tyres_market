<?php
    class comment
    {
        public $author_id = -1;
        public $text = "";

        function __construct($author_id, $text) {
            $this->author_id = $author_id;
            $this->text = $text;
        }

        function get_email(){
            return "gim@gmail.com";
        }

        function get_replies()
        {
            return $this;
            // echo "Get by author id".$author_id; 
        }
    }

?>
