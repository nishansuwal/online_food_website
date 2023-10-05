
<div class="container">
    <h2>Food Items</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Food ID</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foodDataArray as $foodItem)
            <tr>
                <td>{{ $foodItem['food_id'] }}</td>
                <td>{{ $foodItem['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

