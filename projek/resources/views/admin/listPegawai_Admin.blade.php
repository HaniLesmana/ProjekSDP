@extends('admin.base-layout')
@section('header')
    @include('admin.navbarAdmin')
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>List Pegawai</h2></div>
            <div class="col-md-12" style="margin-bottom:10px;">
                <button type="submit" style="width:250px;align:right;border-radius:3px;border:1px solid black; background-color:#FACE7F;align:right; width:65px; font-size:9.5px;">
                    <a href="/admin/addPegawai" style="text-decoration: :none; color:white;">
                        Add Pegawai
                    </a>
                </button>
                <input type="text" name="keyword" id="cariPegawai" style="width:300px; height:28px;border-radius:5px;border: 2px solid #FF914D;font-size:13pt;float: right;margin-left:50px" placeholder="Cari by nama...">
                <select name="jenis" id="jenis" onchange="filterasi()" disabled style="float: right;border: 2px solid #FF914D;border-radius:5px; height:28px;margin-left:5px;font-size:13pt;">
                    <option value="selectcard">All</option>
                    <option value="cleaning">Cleaning</option>
                    <option value="painting">Painting</option>
                    <option value="plumbing">Plumbing</option>
                    <option value="electrical">Electrical</option>
                    <option value="repair">Repair etc</option>
                </select>
                <input type="checkbox" style="float: right;height:20px;width:20px;margin-left:5px" name="" id="caribyJenisPegawai" onclick="filter()">
                <label style="display:inline-block;float:right; padding-top: 4px"> Cari by jenis : </label>
                <div style="clear: both"></div>
            </div>

    </div>
  <div class="table-responsive" id="contentss">
  <table class="table table-striped" id="myTable">
    <thead style="background-color:#E8D0B3;">
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Id</th>
        <th>Email</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Jasa</th>
        <th>Saldo</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($pegawai as $i => $p)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$p->pegawai_nik}}</td>
            <td>{{$p->id}}</td>
            <td>{{$p->pegawai_email}}</td>
            <td>{{$p->pegawai_nama}}</td>
            <td>{{$p->pegawai_alamat}}</td>
            <td>{{$p->pegawai_telepon}}</td>
            <td>{{$p->pegawai_jasa}}</td>
            <td>{{$p->pegawai_saldo}}</td>
            <td>
                <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;margin-top:3px;">
                    <a href="{{ url('admin/EditPegawai/'.$p->id) }}" style="text-decoration:none; color:white;">
                        Edit
                    </a>
                </button>
            </td>
            <td>
                <!-- BUTTON DELETE -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$p->id}}" style="text-decoration: none; border:none; background-color:transparent; text-align:center;">
                    <i class="fa fa-trash" style="font-size:18px;color:red; "></i>
                </button>
                <!-- <button type="submit" style="text-decoration: none; border:none; background-color:white; text-align:center;">

                </button> -->
            </td>
        </tr>
        <!-- MODAL CONFIRM DELETE -->
        <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form method="get" action="{{ url('admin/prosesDeletePegawai/'.$p->id) }}">
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
        </td> --}}


    </tbody>
  </table>
  </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script type="text/javascript">
    $(document).ready(function() {
        $("#cariPegawai").keyup(function(){
            var nama=$("#cariPegawai").val();
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("cariPegawai");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            // $.ajax({
            //     type: 'get',
            //     url: 'hasilCari/w',
            //     success: function(data) {
            //         // $("#contentss").empty();
            //         // $("#contentss").append(data);
            //     }
            // });
        });
    });

    function filter() {
        var checkBox = document.getElementById("caribyJenisPegawai");
        var searchbar = document.getElementById("cariPegawai");
        var jenis = document.getElementById("jenis");
        if (checkBox.checked == true){
            searchbar.disabled = true;
            jenis.disabled = false;
        } else {
            searchbar.disabled = false;
            jenis.disabled = true;
        }
    }
    function filterasi() {
        var ddl = document.getElementById("jenis");
        var selectedValue = ddl.options[ddl.selectedIndex].value.toUpperCase();
        if(selectedValue == "SELECTCARD"){selectedValue = "";}
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("cariPegawai");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[8];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(selectedValue) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection

