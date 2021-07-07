<div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity_name">Nama Kegiatan</label>
                <input type="text" class="form-control" id="activity_name" placeholder="Cari kegiatan..">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity_date">Tanggal Kegiatan</label>
                <input type="date" name="activity_date" class="form-control" id="activity_date">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity_time">Waktu Kegiatan</label>
                <input type="time" name="activity_time" class="form-control" id="activity_time">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Schedule</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Fotografer</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Status</th>
                                <th>Terlaksana</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $schedule->detail->name }}</td>
                                    <td>{{ $schedule->photographer->name }}</td>
                                    <td>{{ $schedule->date->format('d F, Y') }}</td>
                                    <td>{{ date('H:i', strtotime($schedule->detail->start)) . ' - ' . date('H:i', strtotime($schedule->detail->end)) }}
                                    </td>
                                    <td>{{ $schedule->is_approved ? 'Disetujui' : 'Menunggu Konfirmasi' }}</td>
                                    <td>{{ $schedule->already_done && $schedule->already_done_customer ? 'Terlaksana' : 'Belum Terlaksana' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('schedules.show', $schedule->id) }}"
                                            class="btn btn-primary">Detail Pesanan</a>

                                        @if (!$schedule->is_approved)
                                            <button class="btn btn-warning"
                                                onclick="confirm('apakah anda yakin? Data yang sudah di approve tidak akan bisa di batalkan.') || event.stopImmediatePropagation()"
                                                wire:click="orderApproval('{{ $schedule->id }}')"
                                                wire:loading.attr="disabled">
                                                @include('layouts.livewire.loading-button')
                                                <span wire:loading.remove>Approve Pesanan</span>
                                            </button>
                                        @else
                                            @hasrole('superadmin|photographer')
                                            @if (!$schedule->already_done)
                                                <button class="btn btn-info"
                                                    onclick="confirm('apakah anda yakin?.') || event.stopImmediatePropagation()"
                                                    wire:click="hasDonePhotographer('{{ $schedule->id }}')"
                                                    wire:loading.attr="disabled">
                                                    @include('layouts.livewire.loading-button')
                                                    <span wire:loading.remove>Sudah Terlaksana</span>
                                                </button>
                                            @endif
                                            @endhasrole

                                            @hasrole('superadmin|customer')
                                            @if (!$schedule->already_done_customer)
                                                <button class="btn btn-info"
                                                    onclick="confirm('apakah anda yakin?.') || event.stopImmediatePropagation()"
                                                    wire:click="hasDoneCustomer('{{ $schedule->id }}')"
                                                    wire:loading.attr="disabled">
                                                    @include('layouts.livewire.loading-button')
                                                    <span wire:loading.remove>Sudah Terlaksana @role('superadmin')
                                                        (customer) @endrole</span>
                                                </button>
                                            @endif
                                            @endhasrole
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
