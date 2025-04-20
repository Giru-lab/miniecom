<style>
    .qty-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        padding: 0;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease-in-out;
    }

    .qty-btn:hover {
        background-color: #5271FF;
        color: white;
    }

    .qty-display {
        font-size: 1.3rem;
        line-height: 40px;
        text-align: center;
        background-color: transparent;
        user-select: none;
        pointer-events: none;
        padding: 0 5px;
        min-width: 30px;
        display: inline-block;
        white-space: nowrap;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Remove arrows from number input (Firefox) */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<div class="d-flex gap-3 mt-3">
    <button class="btn btn-outline-primary qty-btn" wire:click='decreaseQty'>−</button>
    <input wire:model="updateStock" type="number" id="quantity" class="form-control text-center" value="1" min="1"
        style="width: 80px;">
    <button class="btn btn-outline-primary qty-btn" wire:click='increaseQty'>+</button>
</div>

<script>
    function increaseQty() {
        const qty = document.getElementById('quantity');
        qty.value = parseInt(qty.value) + 1;
    }

    function decreaseQty() {
        const qty = document.getElementById('quantity');
        const current = parseInt(qty.value);
        if (current > 1) {
            qty.value = current - 1;
        }
    }
</script>
