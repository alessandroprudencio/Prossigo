<?php

Route::apiResource('contact', 'ContactController')->only(['store', 'index']);

