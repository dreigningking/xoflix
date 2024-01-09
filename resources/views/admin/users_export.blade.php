<table>
    <thead>
        <tr>
            <td colspan="6">Users </td>
        </tr>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>State</th>
            <th>Payments</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->created_at->format('d-M-Y') }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->state }}</td>
            <td>{{ number_format($user->payments->where('status','success')->sum('amount'), 2)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>