<?php 
    function getExtension($fileName) {
        $TypeFile = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $result = "";
        if($TypeFile == "png" || $TypeFile == "jpg" || $TypeFile == "jpeg") {
            $result = '<i class="fa fa-file-photo-o fileAttach"></i>';
        }else if($TypeFile == "doc" || $TypeFile == "docx") {
            $result = '<i class="fa fa-file-word-o fileAttach"></i>';
        }else if($TypeFile == "pdf") {
            $result = '<i class="fa fa-file-pdf-o fileAttach"></i>';
        }else if($TypeFile == "rar" || $TypeFile == "zip") {
            $result = '<i class="fa fa-file-archive-o fileAttach"></i>';
        }else if($TypeFile == "pptx") {
            $result = '<i class="fa fa-file-powerpoint-o fileAttach"></i>';
        }else if($TypeFile == "xlsx") {
            $result = '<i class="fa fa-file-excel-o fileAttach"></i>';
        }else if($TypeFile == "mp3") {
            $result = '<i class="fa fa-file-audio-o fileAttach"></i>';
        }else if($TypeFile == "txt") {
            $result = '<i class="fa fa-file-text-o fileAttach"></i>';
        }else if($TypeFile == "mp4") {
            $result = '<i class="fa fa-file-video-o fileAttach"></i>';
        }else if($TypeFile == "html" || $TypeFile == "c" || $TypeFile == "php" || $TypeFile == "java" || 
        $TypeFile == "js" || $TypeFile == "cpp" || $TypeFile == "py" || $TypeFile == "cs") {
            $result = '<i class="fa fa-file-code-o fileAttach"></i>';
        }
        return $result;
    }
?>