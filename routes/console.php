<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('telescope:prune')->weekly();
Schedule::command('sanctum:prune-expired')->monthly();
