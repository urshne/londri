<x-app>
    <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#createModal">Add New Member</button>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>Jenis Paket</td>
                    <td>Nama_Paket</td>
                    <td>Harga</td>
                </tr>
            </thead>
            <tbody>
                @foreach($paket as $item)
                <tr>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>
                        <div class="d-flex">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateModal{{ $item->id }}">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">Hapus</button>
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit paket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('paket.update') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jenis" class="form-label">Jenis Paket</label>
                                <select class="form-control" placeholder="Pilih..." name="jenis" id="jenis">
                                    <option disable>Pilih Jenis Paket</option>
                                    <option value="kiloan">Kiloan</option>
                                    <option value="selimut">Selimut</option>
                                    <option value="bed_cover">Bed Cover</option>
                                    <option value="kaos">Kaos</option>
                                    <option value="lain">Dll</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_paket" class="form-label">Nama Paket</label>
                                <input type="text" class="form-control" id="nama_paket" name="nama_paket">
                            </div>
                            <div class="form-group">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit paket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('paket.destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <div class="modal-body">
                            Yakin untuk menghapus data ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('paket._modal')
</x-app>