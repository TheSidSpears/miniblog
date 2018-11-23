<?php

use Miniblog\Renderer;

Renderer::include('modules/head');
Renderer::include($view);
Renderer::include('modules/foot');