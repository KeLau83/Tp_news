<?php

namespace App\Modele;



class News extends NewsBase{

    
    public function __construct(?array $data = null)
    {
        if(!empty($data)){
            $this->hydrate($data);
        }
    }

    private function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __set($attribut, $value)
    {
        $attribut = "_$attribut";
        if(property_exists($this, $attribut)){
            $this->$attribut = $value;
        }
    }

    public function getExtractContent() {
        $content = $this -> getContent();
        if(strlen($content) > 200){
            $extractContent =substr($content, 0, 199);
            $lastSpace = strrpos($extractContent," ");
            $extractContent = substr($extractContent, 0, $lastSpace);
            $content = $extractContent ." ....";
        }

       return nl2br($content);

    }

}
