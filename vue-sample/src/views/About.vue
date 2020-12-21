<template>
  <div class="about">

    <MyBtn Color="green" Text="Mybtn 1" :Start="1" :Limit="5"  />
    
    
    <MyBtn Color="red" Text="Mybtn 2" :Start="10" :Limit="20"  />

  </div>
</template>

<script>
export default {
  components: {
    MyBtn: () => import('@/components/Button')
  }
}
</script>
