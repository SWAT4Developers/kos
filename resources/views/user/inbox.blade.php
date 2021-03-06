@extends('layouts.main')
@section('main-container')
    <div class="content col-md-9">
    @include('partials._errors')

    <div class="rounds panel panel-default">
            <div class="panel-heading"><strong>Recieved Mails ({{ $inbox->count() }})</strong></div>
            <div class="panel-body">
                <table id="" class="table table-striped table-hover no-margin">
                    <thead>
                    <tr>
                        <th class="col-md-2">Sender</th>
                        <th class="col-md-8">Subject</th>
                        <th class="col-md-2 text-right">Time</th>
                    </tr>
                    </thead>
                    <tbody id="data-items">
                    @foreach($inbox as $mail)
                        <tr class="item">
                            <td class="color-main text-bold">{!! link_to_route('user.show', $mail->sender->username, [$mail->sender->username]) !!}</td>
                            
                            <td>
                            @if($mail->seen_at == null)
                            <b>{!! link_to_route('user.inbox.show',htmlentities($mail->subject),[$mail->id],['class' => 'a-simple']) !!}</b>
                            @else
                            {!! link_to_route('user.inbox.show',htmlentities($mail->subject),[$mail->id],['class' => 'a-simple']) !!}
                            @endif
                            </td>

                            <td class="text-right">{{ $mail->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $inbox->render() !!}
            <div id="loading" class="text-center"></div>
        </div>


    </div>
    @endsection