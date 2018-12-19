<?php

    interface iTemplate
    {
        public function Configuration($setFrom, $setTo, $setBody);
        public function Send();
    }