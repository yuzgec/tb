@extends('frontend.layout.app')
@section('title', 'Siparişiniz Başarıyla Oluşturulmutur. | '.config('app.name'))
@section('customCSS')
    <style>
        .animation-ctn{
            text-align:center;
            margin-top:25px;
        }
        @-webkit-keyframes checkmark {
            0% {
                stroke-dashoffset: 100px
            }

            100% {
                stroke-dashoffset: 200px
            }
        }
        @-ms-keyframes checkmark {
            0% {
                stroke-dashoffset: 100px
            }

            100% {
                stroke-dashoffset: 200px
            }
        }
        @keyframes checkmark {
            0% {
                stroke-dashoffset: 100px
            }

            100% {
                stroke-dashoffset: 0px
            }
        }
        @-webkit-keyframes checkmark-circle {
            0% {
                stroke-dashoffset: 480px

            }

            100% {
                stroke-dashoffset: 960px;

            }
        }
        @-ms-keyframes checkmark-circle {
            0% {
                stroke-dashoffset: 240px
            }

            100% {
                stroke-dashoffset: 480px
            }
        }
        @keyframes checkmark-circle {
            0% {
                stroke-dashoffset: 480px
            }

            100% {
                stroke-dashoffset: 960px
            }
        }
        @keyframes colored-circle {
            0% {
                opacity:0
            }

            100% {
                opacity:100
            }
        }
        .inlinesvg .svg svg {
            display: inline
        }
        .icon--order-success svg polyline {
            -webkit-animation: checkmark 0.25s ease-in-out 0.7s backwards;
            animation: checkmark 0.25s ease-in-out 0.7s backwards
        }
        .icon--order-success svg circle {
            -webkit-animation: checkmark-circle 0.6s ease-in-out backwards;
            animation: checkmark-circle 0.6s ease-in-out backwards;
        }
        .icon--order-success svg circle#colored {
            -webkit-animation: colored-circle 0.6s ease-in-out 0.7s backwards;
            animation: colored-circle 0.6s ease-in-out 0.7s backwards;
        }
    </style>

    @endsection
@section('content')

    @endsection
