<div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-9">
            <div class="form-group ">
                <input type="search" wire:model.debounce.500ms="query" class="form-control col-5 float-right"
                    placeholder="Cari..">
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
                                @hasrole('photographer|superadmin|admin')
                                <th>Customer</th>
                                @endhasrole
                                @hasrole('customer|superadmin|admin')
                                <th>Fotografer</th>
                                @endhasrole
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
                                    @hasrole('photographer|superadmin|admin')
                                    <td>{{ $schedule->detail->name }}</td>
                                    @endhasrole
                                    @hasrole('customer|superadmin|admin')
                                    <td>{{ $schedule->photographer->name }}</td>
                                    @endhasrole
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
                                            @hasrole('superadmin|photographer')
                                            <button class="btn btn-warning"
                                                onclick="confirm('apakah anda yakin? Data yang sudah di approve tidak akan bisa di batalkan.') || event.stopImmediatePropagation()"
                                                wire:click="orderApproval('{{ $schedule->id }}')"
                                                wire:loading.attr="disabled">
                                                @include('layouts.livewire.loading-button')
                                                <span wire:loading.remove>Approve Pesanan</span>
                                            </button>
                                            @endhasrole
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
