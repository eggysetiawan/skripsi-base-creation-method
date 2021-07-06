@extends('layouts.app')



@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> Konfirmasi detail pesanan Pesanan</div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-3">Fotografer</dt>
                        <dd class="col-sm-9">{{ $schedule->photographer->name }}</dd>

                        <dt class="col-sm-3">Tanggal Foto</dt>
                        <dd class="col-sm-9">{{ $schedule->date->format('d F, Y') }}</dd>

                        <dt class="col-sm-3">Waktu</dt>
                        <dd class="col-sm-9">
                            {{ date('H:i', strtotime($schedule->detail->start)) . ' - ' . date('H:i', strtotime($schedule->detail->end)) }}
                        </dd>

                        <dt class="col-sm-3">Nama Pemesan</dt>
                        <dd class="col-sm-9">{{ $schedule->detail</dd>



                        </dl>
                    </div>
                    <div class="card-footer">
                        @if (!$schedule->is_confirmed)
                            <livewire:schedules.edit :key="$schedule->id" :schedule="$schedule" />
                        @endif
                    </div>
                </div>
            </div>
        </div>


@endsection
