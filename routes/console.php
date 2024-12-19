<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command("yukata-rm:delete-email-reset-tokens")->everyFifteenMinutes();
