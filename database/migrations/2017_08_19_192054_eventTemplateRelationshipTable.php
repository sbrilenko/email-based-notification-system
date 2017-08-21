<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Events;
use App\Templates;
use App\EventTemplate;
class EventTemplateRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('events_templates', function (Blueprint $table) {
            $table->integer('events_id');
            $table->integer('templates_id');

            $table->primary(['events_id', 'templates_id']);
        });
        $events = ['registration','template_update'];
        $insertedEventsIds = [];
        foreach ($events as $ev) {
            $eventsId = Events::create(['name' => $ev]);
            $insertedEventsIds[] = $eventsId->id;
        }
        $eventsCount = count($insertedEventsIds);
        for ($i=0;$i<$eventsCount;$i++) {
            $templateId = Templates::create(['name' => $events[$i],'subject'=>$events[$i],'template'=>'']);
            EventTemplate::create(['events_id'=>$insertedEventsIds[$i], 'templates_id'=>$templateId->id]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('event_template');
    }
}
