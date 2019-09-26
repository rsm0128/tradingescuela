@extends('layouts.user')
@section('style')
    <style>

        ::-moz-focus-inner {
            padding: 0;
            border: 0;
        }

        button {
            position: relative;
            /*  background-color: #aaa;
              border-radius: 0 3px 3px 0;
              cursor: pointer;*/
        }
        .copied::after {
            position: absolute;
            top: 12%;
            right: 110%;
            display: block;
            content: "COPIED";
            font-size: 1.40em;
            padding: 2px 10px;
            color: #fff;
            background-color: #22a;
            border-radius: 3px;
            opacity: 0;
            will-change: opacity, transform;
            animation: showcopied 1.5s ease;
        }
        @keyframes showcopied {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }
            70% {
                opacity: 1;
                transform: translateX(0);
            }
            100% {
                opacity: 0;
            }
        }

    </style>
@endsection
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $page_title }}</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa-chevron-left"></i></li>
                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                <li><i class="fa fa-minus minimize-card"></i></li>
                                <li><i class="fa fa-times close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12">
                                <label><strong>Grupo privado de Discord.</strong></label>
                                <div class="input-group mb15">
                                    <input type="text" class="form-control input-lg" id="ref" value="https://discordapp.com/invite/bvxUYy6/login" readonly/>
                                    <span class="input-group-btn">
                                        <a href="https://discordapp.com/invite/bvxUYy6/login" target="_blank" class="btn btn-success btn-lg">UNIRSE AL GRUPO</a>
                                    </span>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-12">
                                <!--<form class="form form-horizontal" action="{{ route('save-discord') }}" method="post">-->
                                <!--    {{ csrf_field() }}-->
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control font-weight-bold" for="discord_username">Discord Username : </label>
                                            <div class="col-md-10">
                                                <input type="text" id="discord_username" class="form-control" value="{{ $user->discord_username }}" placeholder="Discord ID" name="discord_username" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control font-weight-bold" for="discord_id">Discord ID : </label>
                                            <div class="col-md-10">
                                                <input type="text" id="discord_id" class="form-control" value="{{ $user->discord_id }}" placeholder="Discord ID" name="discord_id" readonly>
                                            </div>
                                        </div>
                                        <!--<div class="text-right">-->
                                        <!--    <button type="submit" class="btn btn-primary bg-softwarezon-x"><i class="ft-navigation"></i> Save</button>-->
                                        <!--</div>-->
                                    </div>
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>

        (function() {

            'use strict';
            document.body.addEventListener('click', copy, true);
            // event handler
            function copy(e) {
                var
                    t = e.target,
                    c = t.dataset.copytarget,
                    inp = (c ? document.querySelector(c) : null);
                if (inp && inp.select) {
                    inp.select();
                    try {
                        document.execCommand('copy');
                        inp.blur();
                        t.classList.add('copied');
                        setTimeout(function() { t.classList.remove('copied'); }, 1500);
                    }
                    catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }
                }
            }

        })();
    </script>
@endsection