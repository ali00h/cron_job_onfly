@extends('layout')

@section('title')
Dashbord
@endsection

@section('content')
<div class="box">
    <h1 class="title">Cron Job List</h1>

    <table class="table is-fullwidth">
    <thead>
        <tr>
            <th><abbr title="Index">#</abbr></th>
            <th><abbr title="Cron Job">Cron Job</abbr></th>
            <th><abbr title="Last Action">Last Action</abbr></th>
            <th><abbr title="Detail">Detail</abbr></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><abbr title="Index">#</abbr></th>
            <th><abbr title="Cron Job">Cron Job</abbr></th>
            <th><abbr title="Last Action">Last Action</abbr></th>
            <th><abbr title="Detail">Detail</abbr></th>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td>1</td>
            <td>* * * * * wget https://en.wikipedia.org/wiki/Leicester.php?p=123</td>
            <td>2023-05-21 12:52</td>
            <td>
                <a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Detail</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>* * * * * wget https://en.wikipedia.org/wiki/Leicester.php?p=123</td>
            <td>2023-05-21 12:52</td>
            <td>
                <a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Detail</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>* * * * * wget https://en.wikipedia.org/wiki/Leicester.php?p=123</td>
            <td>2023-05-21 12:52</td>
            <td>
                <a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Detail</a>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>* * * * * wget https://en.wikipedia.org/wiki/Leicester.php?p=123</td>
            <td>2023-05-21 12:52</td>
            <td>
                <a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Detail</a>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>* * * * * wget https://en.wikipedia.org/wiki/Leicester.php?p=123</td>
            <td>2023-05-21 12:52</td>
            <td>
                <a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Detail</a>
            </td>
        </tr>                        

    </tbody>
    </table>

</div>


@endsection

