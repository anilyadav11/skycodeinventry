@extends('layout.app')

@section('content')
<div class="container">
    <h2>Create Billing</h2>
    <form action="{{ route('billing.store') }}" method="POST">
        @csrf

        <!-- Customer Selection -->
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                <option value="">Select Customer</option>
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Billing Date -->
        <div class="mb-3">
            <label for="order_date" class="form-label">Billing Date</label>
            <input type="date" name="order_date" id="order_date" class="form-control" required>
        </div>

        <!-- Order Items -->
        <div class="mb-3">
            <h4>Order Items</h4>
            <table class="table table-bordered" id="orderItems">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Type</th>
                        <th>Unit Type</th>
                        <th>Customer Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th><button type="button" class="btn btn-success" id="addRow">+</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="products[]" class="form-control product-select" required>
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="types[]" class="form-control type-select" required>
                                <option value="">Select Type</option>
                            </select>
                        </td>
                        <td>
                            <select name="unit_types[]" class="form-control unit-type-select" required>
                                <option value="">Select Unit Type</option>
                            </select>
                        </td>
                        <td>
                            <select name="customer_types[]" class="form-control customer-type-select" required>
                                <option value="">Select Customer Type</option>
                            </select>
                        </td>
                        <td><input type="number" name="prices[]" class="form-control price" readonly></td>
                        <td><input type="number" name="quantities[]" class="form-control quantity" required></td>
                        <td><input type="number" name="totals[]" class="form-control total" readonly></td>
                        <td><button type="button" class="btn btn-danger removeRow">-</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Total Amount -->
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total Amount</label>
            <input type="number" name="total_amount" id="total_amount" class="form-control" readonly>
        </div>

        <!-- Payment Status -->
        <div class="mb-3">
            <label for="payment_status" class="form-label">Payment Status</label>
            <select name="payment_status" id="payment_status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    // Add new row to the order items table
    document.getElementById('addRow').addEventListener('click', function() {
        const row = `
            <tr>
                <td>
                    <select name="products[]" class="form-control product-select" required>
                        <option value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="types[]" class="form-control type-select" required>
                        <option value="">Select Type</option>
                    </select>
                </td>
                <td>
                    <select name="unit_types[]" class="form-control unit-type-select" required>
                        <option value="">Select Unit Type</option>
                    </select>
                </td>
                <td>
                    <select name="customer_types[]" class="form-control customer-type-select" required>
                        <option value="">Select Customer Type</option>
                    </select>
                </td>
                <td><input type="number" name="prices[]" class="form-control price" readonly></td>
                <td><input type="number" name="quantities[]" class="form-control quantity" required></td>
                <td><input type="number" name="totals[]" class="form-control total" readonly></td>
                <td><button type="button" class="btn btn-danger removeRow">-</button></td>
            </tr>
        `;
        document.getElementById('orderItems').insertAdjacentHTML('beforeend', row);
    });

    // Remove row from the order items table
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest('tr').remove();
            calculateTotal();
        }
    });

    // Fetch product pricing data based on the selected product
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('product-select')) {
            const productId = e.target.value;
            const row = e.target.closest('tr');
            fetch(`/get-pricing/${productId}`)
                .then(response => response.json())
                .then(data => {
                    const typeSelect = row.querySelector('.type-select');
                    const unitTypeSelect = row.querySelector('.unit-type-select');
                    const customerTypeSelect = row.querySelector('.customer-type-select');

                    // Clear existing options
                    typeSelect.innerHTML = '<option value="">Select Type</option>';
                    unitTypeSelect.innerHTML = '<option value="">Select Unit Type</option>';
                    customerTypeSelect.innerHTML = '<option value="">Select Customer Type</option>';

                    // Populate types, unit types, and customer types
                    data.forEach(pricing => {
                        const typeOption = document.createElement('option');
                        typeOption.value = pricing.type;
                        typeOption.textContent = pricing.type;
                        typeSelect.appendChild(typeOption);

                        const unitOption = document.createElement('option');
                        unitOption.value = pricing.unit_type;
                        unitOption.textContent = pricing.unit_type;
                        unitTypeSelect.appendChild(unitOption);

                        const customerOption = document.createElement('option');
                        customerOption.value = pricing.customer_type;
                        customerOption.textContent = pricing.customer_type;
                        customerTypeSelect.appendChild(customerOption);
                    });
                });
        }

        // Update price when customer type or unit type is selected
        if (e.target.classList.contains('unit-type-select') || e.target.classList.contains('customer-type-select')) {
            const row = e.target.closest('tr');
            const productId = row.querySelector('.product-select').value;
            const type = row.querySelector('.type-select').value;
            const unitType = e.target.value;
            const customerType = row.querySelector('.customer-type-select').value;

            if (productId && type && unitType && customerType) {
                fetch(`/get-price/${productId}/${type}/${unitType}/${customerType}`)
                    .then(response => response.json())
                    .then(data => {
                        const priceInput = row.querySelector('.price');
                        priceInput.value = data.price || 0;
                        const quantity = row.querySelector('.quantity').value || 0;
                        row.querySelector('.total').value = data.price * quantity;
                        calculateTotal();
                    });
            }
        }
    });

    // Calculate the overall total of the order
    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.total').forEach(el => {
            total += parseFloat(el.value || 0);
        });
        document.getElementById('total_amount').value = total;
    }
</script>
@endsection