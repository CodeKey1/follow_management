@if (@isset($data) && !@empty($data) && count($data) > 0)

    <table id="example2" class="table table-bordered table-hover">
        <thead class="custom_thead">
            <th style="width: 11%;"> الجهة </th>
            <th> الموضوع </th>
            <th style="width:18%"> المسؤل </th>
            <th> تأشيرة السيد المحافظ </th>
            <th style="width: 8%;"> موقف التنفيذ </th>
            <th> ملاحظات </th>
        </thead>
        <tbody>
            @foreach ($data as $info)
                <tr>
                    <td>{{ $info->name_side->side_name }}</td>
                    <td>{{ $info->name }}</td>
                    <td>
                        <ul>
                            @foreach ($info->rsename as $value)
                                <li>{{ $value->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $info->vic_sign }}
                    </td>

                    <td>
                        @if ($info->state == 1)
                            <span class="visually-hidden" style="color: #000"> تم التنفيذ </span>
                        @elseif($info->state == 0)
                            <span class="visually-hidden" style="color: #000"> لم يتم </span>
                        @elseif($info->state == 2)
                            <span class="visually-hidden" style="color: #000"> جاري </span>
                        @endif
                    </td>
                    <td>{{ $info->notes }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div class="col-md-12" id="ajax_pagination_in_search">

    </div>
@else
    <div class="alert alert-danger">
        عفوا لاتوجد بيانات لعرضها !!
    </div>
@endif
