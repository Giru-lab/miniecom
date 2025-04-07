
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
</style>

<div class="d-flex align-items-center justify-content-center gap-3">
  <button class="btn btn-outline-primary qty-btn" wire:click="setQuantity(-1)">−</button>
  <div id="quantity" class="qty-display">{{ $quantity }}</div>
  <button class="btn btn-outline-primary qty-btn" wire:click="setQuantity(+1)">+</button>
</div>

<script>
  function increaseQty() {
    const qty = document.getElementById('quantity');
    qty.textContent = parseInt(qty.textContent) + 1;
  }

  function decreaseQty() {
    const qty = document.getElementById('quantity');
    const current = parseInt(qty.textContent);
    if (current > 1) {
      qty.textContent = current - 1;
    }
  }
</script>
