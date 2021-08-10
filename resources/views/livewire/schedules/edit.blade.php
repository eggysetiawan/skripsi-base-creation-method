<div>

    @hasrole('superadmin|customer')
    @if (!$schedule->is_confirmed)
        <button wire:click="editMaut" class="btn btn-primary btn-sm" data-toggle="modal"
            data-target="#exampleModalMaut-{{ $schedule->id }}">
            Edit Pesanan
        </button>
        <button
            onclick="confirm('apakah anda yakin? Data yang sudah di konfirmasi tidak akan bisa di ubah.') || event.stopImmediatePropagation()"
            wire:click="confirmOrder" class="btn btn-success btn-sm">
            <span wire:loading.remove>Konfrimasi Order</span>
            <div wire:loading>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>

        </button>
    @endif
    @endhasrole


    @hasrole('photographer|superadmin')
    @if ($schedule->photographer_id == auth()->id() && $schedule->is_approved < 1)

        <div class="btn-group">
            <button
                onclick="confirm('apakah anda yakin? Data yang sudah di konfirmasi tidak akan bisa di ubah.') || event.stopImmediatePropagation()"
                wire:click="orderApproval" class="btn btn-success">
                Approve Order
            </button>
            <button
                onclick="confirm('apakah anda yakin? Data yang sudah di konfirmasi tidak akan bisa di ubah.') || event.stopImmediatePropagation()"
                wire:click="rejectOrder" class="btn btn-danger">
                Reject Order
            </button>
        </div>
    @endif

    @endhasrole

    <div class="modal fade" id="exampleModalMaut-{{ $schedule->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Order
                        by Maut</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Fotografer:</label>
                        <input type="text" wire:model="photographerMaut" class="form-control" disabled>
                    </div>
                    {{-- tanggal --}}
                    <div class="form-group">
                        <label for="date">Pilih Tanggal</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" id="date" wire:model.debounce.180s="dateMaut"
                                class="form-control @error('dateMaut') is-invalid @enderror">
                            @error('dateMaut')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- mulai --}}
                    <div class="form-group">
                        <label for="startMaut">Mulai</label>
                        <input type="time" wire:model.debounce.180s="startMaut" class="form-control" id="startMaut">
                    </div>

                    {{-- selesai --}}
                    <div class="form-group">
                        <label for="endMaut">Selesai</label>
                        <input type="time" wire:model.debounce.180s="endMaut" class="form-control" id="endMaut">
                    </div>

                    {{-- note --}}
                    <div class="form-group">
                        <label for="noteMaut">Catatan</label>
                        <textarea wire:model.debounce.180s="noteMaut" id="noteMaut" class="form-control"
                            placeholder="Berikan catatan untuk sesi foto.."></textarea>
                    </div>

                    {{-- name --}}
                    <div class="form-group">
                        <label for="nameMaut">Nama Pemesan</label>
                        <input type="text" wire:model.debounce.180s="nameMaut" id="nameMaut" class="form-control"
                            value="{{ auth()->user()->name }}" placeholder="Masukan nama customer..">
                    </div>

                    {{-- mobile --}}
                    <div class="form-group">
                        <label for="mobileMaut">No Hp</label>
                        <input type="number" wire:model.debounce.180s="mobileMaut"
                            value="{{ auth()->user()->mobile }}" id="mobileMaut" class="form-control"
                            placeholder="Masukan nomor Hp customer..">
                    </div>

                    <div class="form-group">
                        <label for="emailmaut">Alamat Email</label>
                        <input type="email" wire:model.debounce.180s="emailMaut" id="emailMaut" class="form-control"
                            value="{{ auth()->user()->email }}" placeholder="Masukan email customer..">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click.prevent="updateMaut">Update
                        Order
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
