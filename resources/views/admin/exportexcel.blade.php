<table>
    <thead>
        <tr>
            <th>Họ tên</th>
            <th>Địa chỉ</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $data)
        <tr>
            <td>{{ $data->Hoten }}</td>
            <td>{{ $data->Ngaychamcong }}</td>
            <td>
                @if($data->Loaichamcong == 1)
                {{'Đúng giờ'}}
                @elseif($data->Loaichamcong == 2)
                {{'Đi chậm'}}
                @else($data->Loaichamcong == 3)
                {{'Nghỉ'}}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>