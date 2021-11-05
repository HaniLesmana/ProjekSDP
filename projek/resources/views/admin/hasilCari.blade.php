{{-- @if (isset($pegawai))
<table class="table table-striped">
    <thead style="background-color:#E8D0B3;">
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Id</th>
        <th>Email</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Password</th>
        <th>Telepon</th>
        <th>Jasa</th>
        <th>Saldo</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($pegawai as $i => $p)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$p->pegawai_nik}}</td>
            <td>{{$p->pegawai_id}}</td>
            <td>{{$p->pegawai_email}}</td>
            <td>{{$p->pegawai_nama}}</td>
            <td>{{$p->pegawai_alamat}}</td>
            <td>{{$p->pegawai_password}}</td>
            <td>{{$p->pegawai_telepon}}</td>
            <td>{{$p->pegawai_jasa}}</td>
            <td>{{$p->pegawai_saldo}}</td>
            <td>{{$p->pegawai_status}}</td>
            <td>
                <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;margin-top:3px;">
                    <a href="/admin/EditPegawai/{{$p->pegawai_id}}" style="text-decoration: :none; color:white;">
                        Edit
                    </a>
                </button>
            </td>
            <td>
                <!-- BUTTON DELETE -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; border:none; background-color:transparent; text-align:center;">
                    <i class="fa fa-trash" style="font-size:18px;color:red; "></i>
                </button>
                <button type="submit" style="text-decoration: none; border:none; background-color:white; text-align:center;">

                </button>
            </td>
        </tr>
        <!-- MODAL CONFIRM DELETE -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form method="get" action="{{ url("/admin/prosesDeletePegawai/".$p->pegawai_id) }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
        {{-- <td>1</td>
        <td>P001</td>
        <td>hani@gmail.com</td>
        <td>Hani</td>
        <td>hayoapa</td>
        <td>123456789</td>
        <td>ART</td>
        <td>0</td>
        <td>Aktif</td>
        <td>
        <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;">
            <a href="/admin/editPegawai" style="text-decoration: :none; color:white;">
                Edit
            </a>
        </button>
        </td>
        <td>
            <button type="submit" style="text-decoration: none; border:none; background-color:white; text-align:center;">
                <i class="fa fa-trash" style="font-size:18px;color:red; "></i>
            </button>
        </td>


    </tbody>
  </table>
@endif
 --}}
