<?php

class ResourceController extends Controller{
    
    public function GetJavascript($name)
    {
        return $this->MakeResource("js." . $name, 'text/javascript');
    }
    
    protected function MakeResource($viewName, $contentType)
    {
        $contents = View::make($viewName);
        $response = Response::make($contents, 200);
        $response->header('Content-Type', $contentType);
        
        return $response;
    }
    
}

