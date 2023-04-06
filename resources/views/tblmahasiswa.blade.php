<table border="1" class="table table-striped text-center" id="tb-mahasiswa">
    <tr>
        <th>Nomor</th>
        <th>NPM</th>
        <th>Nama</th>
        <th>Phone</th>
        <th>Alamat</th>
        <th>Opsi</th>
    </tr>
    <?php $no = 1; ?>
    @foreach($mahasiswa as $Get)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $Get['npm'] }}</td>
            <td>{{ $Get['nama'] }}</td>
            <td>{{ $Get['hp'] }}</td>
            <td>{{ $Get['alamat'] }}</td>
            <td>
                <a href="#" onclick="ModalEditMahasiwa({{ $Get['npm'] }} , '{{ $Get['nama'] }}', '{{ $Get['hp'] }}', '{{ $Get['alamat'] }}')"
                    class="btn btn-warning"><i class="las la-edit"></i>Edit</a>
                <a href="#" onclick="ModalHapusMahasiwa({{ $Get['npm'] }})" class="btn btn-danger"><i class="las la-trash-alt"></i>Delete</a>
            </td>
        </tr>
        <?php $no++;?>
    @endforeach
</table>