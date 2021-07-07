@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('schedules.index') }}">Jadwal</a></li>
    <li class="breadcrumb-item active">Konfirmasi Pesanan</li>
@endsection


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> Konfirmasi detail pesanan anda</div>
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
                        <dd class="col-sm-9">{{ $schedule->detail->name }}</dd>

                        <dt class="col-sm-3">No. Hp</dt>
                        <dd class="col-sm-9">{{ $schedule->detail->mobile }}</dd>

                        <dt class="col-sm-3">Alamat Email</dt>
                        <dd class="col-sm-9">{{ $schedule->detail->email }}</dd>

                        <dt class="col-sm-3">Catatan/Note</dt>
                        <dd class="col-sm-9">
                            <p>{{ $schedule->detail->note }}</p>
                        </dd>

                        @if ($schedule->is_approved)
                            <dt class="col-sm-3">Pdf</dt>
                            <dd class="col-sm-9">
                                <a href="{{ route('pdf.schedule', $schedule->id) }}">Lihat Pdf</a>
                            </dd>
                        @endif



                    </dl>
                </div>

                @if (!$schedule->is_confirmed)
                    <div class="card-footer">
                        <livewire:schedules.edit :key="$schedule->id" :schedule="$schedule" />
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection
