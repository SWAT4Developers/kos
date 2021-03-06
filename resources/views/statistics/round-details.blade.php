@extends('layouts.main')
@section('meta-desc',"Round indi Details")
@section('title',"Round - Map: $round->mapName, $round->timeAgo")

@section('main-container')
    <div class="col-md-9">
        @include('partials._statistics-navbar')

        <div class="well round-detail-summary text-center">
            {{ $round->timeAgo }} &nbsp;&squarf;&nbsp; {{ $round->mapName }}  &nbsp;&squarf;&nbsp; Round time: {{ $round->time }}
        </div>

        <div class="round-detail-teamscores" style="background-image: url('/images/game/maps/background-small/{{ $round->map_id }}.jpg')">
            <div class="round-team-scores row">
                <div class="round-team-score col-md-5" style="background-color: rgba(0, 15, 198, 0.35);border: 1px solid #090575;">
                    SWAT
                    <div class="round-team-score-value" style="float:right;">
                        {!! $round->swatScoreWithColor !!}
                    </div>
                </div>
                <div class="round-team-score col-md-5 col-md-offset-1 text-right" style="background-color: rgba(198, 13, 0, 0.35);border: 1px solid #750C05;">
                    SUSPECTS
                    <div class="round-team-score-value" style="float:left;">
                        {!! $round->suspectsScoreWithColor !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default round-detail-toppers">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5><b>Top Scorer</b></h5>
                        <img class="left img-thumbnail" src="/images/game/chars/50/{{ $round->topScorer->team."_".$round->topScorer->loadout->body."_".$round->topScorer->loadout->head }}.jpg">
                        <div class="col-md-8" style="padding-left: 0px">
                            <p class="round-detail-topper-title">{!! link_to_route('player-detail',$round->topScorer->name,[$round->topScorer->playerTotal()->id,$round->topScorer->name]) !!}</p>
                            <p class="left round-detail-topper-value">Score: <b>{{ $round->topScorer->score }}</b></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Mass Arrester</b></h5>
                        <img class="left img-thumbnail" src="/images/game/chars/50/{{ $round->massArrester->team."_".$round->massArrester->loadout->body."_".$round->massArrester->loadout->head }}.jpg">
                        <div class="col-md-8" style="padding-left: 0px">
                            <p class="round-detail-topper-title">{!! link_to_route('player-detail',$round->massArrester->name,[$round->massArrester->playerTotal()->id,$round->massArrester->name]) !!}</p>
                            <p class="left round-detail-topper-value">Arrests: <b>{{ $round->massArrester->arrests }}</b></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Killing Machine</b></h5>
                        <img class="left img-thumbnail" src="/images/game/chars/50/{{ $round->killingMachine->team."_".$round->killingMachine->loadout->body."_".$round->killingMachine->loadout->head }}.jpg">
                        <div class="col-md-8" style="padding-left: 0px">
                            <p class="round-detail-topper-title">{!! link_to_route('player-detail',$round->killingMachine->name,[$round->killingMachine->playerTotal()->id,$round->killingMachine->name]) !!}</p>
                            <p class="left round-detail-topper-value">Kills: <b>{{ $round->killingMachine->kills }}</b></p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h5><b>Best Deathstreak</b></h5>
                        <img class="left img-thumbnail" src="/images/game/chars/50/{{ $round->bestDeathStreak->team."_".$round->bestDeathStreak->loadout->body."_".$round->bestDeathStreak->loadout->head }}.jpg">
                        <div class="col-md-8" style="padding-left: 0px">
                            <p class="round-detail-topper-title">{!! link_to_route('player-detail',$round->bestDeathStreak->name,[$round->bestDeathStreak->playerTotal()->id,$round->bestDeathStreak->name]) !!}</p>
                            <p class="left round-detail-topper-value">Deaths: <b>{{ $round->bestDeathStreak->death_streak }}</b></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Best Arreststreak</b></h5>
                        <img class="left img-thumbnail" src="/images/game/chars/50/{{ $round->bestArrestStreak->team."_".$round->bestArrestStreak->loadout->body."_".$round->bestArrestStreak->loadout->head }}.jpg">
                        <div class="col-md-8" style="padding-left: 0px">
                            <p class="round-detail-topper-title">{!! link_to_route('player-detail',$round->bestArrestStreak->name,[$round->bestArrestStreak->playerTotal()->id,$round->bestArrestStreak->name]) !!}</p>
                            <p class="left round-detail-topper-value">Arrests: <b>{{ $round->bestArrestStreak->arrest_streak }}</b></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Best Killstreak</b></h5>
                        <img class="left img-thumbnail" src="/images/game/chars/50/{{ $round->bestKillStreak->team."_".$round->bestKillStreak->loadout->body."_".$round->bestKillStreak->loadout->head }}.jpg">
                        <div class="col-md-8" style="padding-left: 0px">
                            <p class="round-detail-topper-title">{!! link_to_route('player-detail',$round->bestKillStreak->name,[$round->bestKillStreak->playerTotal()->id,$round->bestKillStreak->name]) !!}</p>
                            <p class="left round-detail-topper-value">Kills: <b>{{ $round->bestKillStreak->kill_streak }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="round-detail-players row no-padding no-margin">
            <div class="round-detail-players-swat panel panel-info col-md-6 no-margin no-padding">
                <div class="panel-heading"><strong>SWAT</strong></div>
                <div class="panel-body">
                    @if($round->SwatPlayers->isEmpty())
                        <h5>Its lone here.</h5>
                    @else
                    <table class="table table-hover table-striped no-margin">
                        <thead>
                        <tr>
                            <th class="col-md-1">Rank</th>
                            <th class="col-md-1">Flag</th>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-1 text-right">Score</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($round->SwatPlayers as $swat)
                            <tr class="getindistats" data-id="{{ $swat->id }}">
                                <td>{!! Html::image('/images/game/insignia/'.$swat->playerTotal()->rank->id.".png",$swat->playerTotal()->rank->shortname,['class' => 'tooltipster', 'title' => $swat->playerTotal()->rank->name,'height' => '22px']) !!}</td>
                                <td>{!! Html::image('/images/flags/20_shiny/'.$swat->country->countryCode.".png",$swat->country->countryCode,['class' => 'tooltipster', 'title' => $swat->country->countryName]) !!}</td>
                                <td><strong>{{ $swat->name }}</strong></td>
                                <td class="text-right"><strong>{{ $swat->score }}</strong></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            <div class="round-detail-players-suspects panel panel-danger col-md-6 no-margin no-padding">
                <div class="panel-heading"><strong>SUSPECTS</strong></div>
                <div class="panel-body">
                    @if($round->SuspectPlayers->isEmpty())
                        <h5>Its lone here.</h5>
                    @else
                    <table class="table table-hover table-striped no-margin">
                        <thead>
                        <tr>
                            <th class="col-md-1">Rank</th>
                            <th class="col-md-1">Flag</th>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-1 text-right">Score</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($round->SuspectPlayers as $suspect)
                            <tr class="getindistats" data-id="{{ $suspect->id }}">
                                <td>{!! Html::image('/images/game/insignia/'.$suspect->playerTotal()->rank->id.".png",$suspect->playerTotal()->rank->shortname,['class' => 'tooltipster', 'title' => $suspect->playerTotal()->rank->name,'height' => '22px']) !!}</td>
                                <td>{!! Html::image('/images/flags/20_shiny/'.$suspect->country->countryCode.".png",$suspect->country->countryCode,['class' => 'tooltipster', 'title' => $suspect->country->countryName]) !!}</td>
                                <td><strong>{{ $suspect->name }}</strong></td>
                                <td class="text-right"><strong>{{ $suspect->score }}</strong></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>

        <div id="indiplayerstats" class="row no-margin no-padding">
            <!-- Player Individual Data Starts -->
            <div class="panel panel-default col-md-12 no-padding">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>{!! link_to_route('player-detail',$round->topScorer->name,[$round->topScorer->playerTotal()->id,$round->topScorer->name]) !!}</b>{!! Html::image('/images/flags/20/'.$round->topScorer->country->countryCode.".png",$round->topScorer->country->countryCode,['title' => $round->topScorer->country->countryName,'class' => 'right tooltipster']) !!}</div>
                <!-- list -->
                <ul class="list-group col-md-4">
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->kills }}</span>
                        Kills
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->deaths }}</span>
                        Deaths
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->deaths == 0 ? $round->topScorer->kills : round($round->topScorer->kills/$round->topScorer->deaths,2) }}</span>
                        Kill / Death Ratio
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->team_kills }}</span>
                        Team Kills
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->kill_streak }}</span>
                        Best Killstreak
                    </li>
                </ul>

                <ul class="list-group col-md-4">
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->arrests }}</span>
                        Arrests
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->arrested }}</span>
                        Arrested
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->arrested == 0 ? $round->topScorer->arrests : round($round->topScorer->arrests/$round->topScorer->arrested,2) }}</span>
                        Arrests / Arrested Ratio
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->arrest_streak }}</span>
                        Best Arreststreak
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->death_streak }}</span>
                        Best Deathstreak
                    </li>
                </ul>

                <ul class="list-group col-md-4">
                    <li class="list-group-item">
                        <span class="badge">{{ App\Server\Utils::getMSbyS($round->topScorer->time_played,"%dm %ds") }}</span>
                        Time Played
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->score_per_min }}</span>
                        Score / Min
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $round->topScorer->score }}</span>
                        Total Score
                    </li>
                </ul>

            </div>
            <!-- / Player Individual Data Ends -->
        </div>

    </div>
@endsection