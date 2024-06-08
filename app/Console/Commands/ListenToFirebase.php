<?php

namespace App\Console\Commands;

use App\Models\FirebaseData;
use Illuminate\Console\Command;
use Kreait\Firebase\Database\Query;
use Kreait\Firebase\Factory;

class ListenToFirebase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'firebase:listen';
    protected $description = 'Listen to Firebase Realtime Database and store data in MySQL';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $factory = (new Factory())->withServiceAccount(config('services.firebase.credentials.file'));
        $database = $factory->createDatabase();

        $references =  $database->getReference('/https://monitoring-5183a-default-rtdb.asia-southeast1.firebasedatabase.app/')
            ->orderByChild('timestamp')
            ->startAt(time());
        
        $snapshot = $references->getSnapshot();
        $data = $snapshot->getValue();
        
        echo($data);
        // foreach ($data as $item) {
        //     FirebaseData::create($item); // Store data in MySQL
        // }
    }
}
