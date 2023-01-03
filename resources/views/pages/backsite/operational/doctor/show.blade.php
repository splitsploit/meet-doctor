<table class="table table-bordered">
    <tr>
        <th>User Account</th>
        <td>{{ isset($doctor->user->name) ? $doctor->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Specialist</th>
        <td>{{ isset($doctor->specialist->name) ? $doctor->specialist->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ isset($doctor->name) ? $doctor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Fee</th>
        <td>{{ isset($doctor->fee) ? 'IDR '.number_format($doctor->fee) : 'N/A' }}</td>
    </tr>
</table>
