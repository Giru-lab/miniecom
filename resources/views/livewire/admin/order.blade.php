<div>
  <div class="com_card mx-2">
      <h3 class="com_card_title mb-3">All Orders</h3>

    <div class="d-flex justify-content-between align-items-center gap-2 text-white" >
        <div class="d-flex gap-2">
            <div class="p-3 rounded-5 bg-success cursor-pointer" style="cursor: pointer;" wire:click="changeStatus(1)">Approved</div>
            <div class="p-3 rounded-5 bg-danger cursor-pointer" style="cursor: pointer;" wire:click="changeStatus(0)">Pending</div>
        </div>
        <div id="custom-buttons" class="d-flex gap-2 mb-3 justify-content-center mt-4"></div>
    </div>
      <div class="table-responsive flex">
          <input type="search" placeholder="Search orders..." class="form-control w-100 w-sm-25 mb-3" id="table-search" />
          <table id="table" class="data-table table rounded-0">
              <thead class="thead-light">
                  <tr class="table-dark">
                      <th class="text-center p-2 text-white">Order ID</th>
                      <th class="text-center p-2 text-white">Customer Name</th>
                      <th class="text-center p-2 text-white">Status</th>
                      <th class="text-center p-2 text-white">Total price</th>
                      <th class="text-center p-2 text-white">Action</th>
                  </tr>
              </thead>

              <tbody>
                  @foreach ($orders as $order)
                  <tr class="table-light">
                      <td class="text-center p-3">
                          <a href="{{ route('orders.show', $order->id) }}" class="text-primary">
                              {{ $order->id }}
                          </a>
                      </td>
                      <td class="text-center p-3">{{ $order->user->name }}</td>
                      <td class="text-center p-3">{{ $order->status }}</td>
                      
                      <td class="text-center p-3">
                          <a href="#" class="text-primary">
                              {{ $order->total_price }}
                          </a>
                      </td>

                      <td class="text-center p-3">
                          <a href="{{ route('orders.show', $order->id) }}" class="text-white btn btn-sm btn-success" wire:click="approveOrder({{ $order->id }})">View</a>
                          <button class="btn btn-sm btn-primary" wire:click="approveOrder({{ $order->id }})">Approve</button>
                          <button class="btn btn-sm btn-danger" wire:click="cancelOrder({{ $order->id }})">Cancel</button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>

 
</div>


@push('scripts')
<script>
    function initDataTable() {
        if ($.fn.DataTable.isDataTable('#table')) {
            $('#table').DataTable().destroy();
        }

        const table = $('#table').DataTable({
            ordering: false,
            dom: 'Brtip',
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn btn-sm btn-white',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    },
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm btn-white',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    },
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-sm btn-white',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    },
                    customize: function (doc) {
                        doc.content[1].table.widths = '*'.repeat(doc.content[1].table.body[0].length).split('');
                    },
                },
            ],
            pagingType: 'simple_numbers',
        });

        $('#table-search').on('keyup', function () {
            table.search(this.value).draw();
        });

        table.buttons().container().appendTo('#custom-buttons');
    }

    $(document).ready(function () {
        initDataTable();
    });

    Livewire.on('contentChanged', () => {
        setTimeout(() => {
            initDataTable();
        }, 100);
    });
</script>
@endpush


