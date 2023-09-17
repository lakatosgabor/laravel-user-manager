<script setup>
import { useDate } from '@/composables/date.ts'

const { daysAgo } = useDate()

const props = defineProps({
  data: Array,
})
</script>

<template>
  <el-table :data="props.data.data">
    <el-table-column label="General Information">
      <el-table-column prop="name" label="Name" />
    </el-table-column>
    <el-table-column label="Chronology">
      <el-table-column label="Created">
        <template #default="scope">
          {{ daysAgo(scope.row.created_at) }}
        </template>
      </el-table-column>
      <el-table-column label="Updated">
        <template #default="scope">
          {{ daysAgo(scope.row.updated_at) }}
        </template>
      </el-table-column>
      <el-table-column width="80">
        <template #header>
          <div class="text-center">Actions</div>
        </template>
        <template #default="scope">
          <Link
            :href="route('roles.destroy', scope.row)"
            class="btn w-full"
            method="delete"
            preserve-scroll
            confirm
          >
            <span class="pi pi-trash"></span>
          </Link>
        </template>
      </el-table-column>
    </el-table-column>
  </el-table>
</template>

<style scoped></style>
