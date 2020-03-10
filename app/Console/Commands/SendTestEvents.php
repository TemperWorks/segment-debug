<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Segment;

class SendTestEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'segment:fireTestEvent {numberOfEvents : Number of events to sent}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fire n test events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        Segment::init(env('SEGMENT_KEY'));
        $randomKey = Str::random(3);
        $eventName = "test_event_{$randomKey}";
        $numberOfEvents = (int) $this->argument('numberOfEvents');
        foreach (range(1, $numberOfEvents) as $number) {
            $key = Str::random(6);
            Segment::track(
                [
                    'userId' => '000000',
                    'event' => $eventName,
                    'properties' => [
                        'key' => $key,
                        'number' => $number
                    ],
                ]
            );
        }
        $this->info("fired $numberOfEvents events with name {$eventName}");
    }
}
