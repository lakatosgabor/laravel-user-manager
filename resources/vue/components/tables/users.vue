<script setup>
import { useDate } from '@/composables/date.ts'
import { computed } from 'vue'

/**
 * Returns the first letter of a users name
 *
 * @param user {object}
 *
 * @returns {string}
 */
const firstLetter = (user) =>
  computed(() => user.name.charAt(0).toUpperCase()).value

/**
 * Returns the status of a user account
 *
 * @param data
 *
 * @returns {string}
 */
const status = (data) => (data.deleted_at ? 'Deleted' : 'Active')

// date formatting
const { daysAgo } = useDate()

// props
const props = defineProps({
  data: [Array, Object],
})
</script>

<template>
  <el-table :data="props.data.data">
    <el-table-column label="General Information">
      <el-table-column label="Name">
        <template #default="scope">
          <div class="flex justify-start">
            {{ scope.row.name }}
          </div>
        </template>
      </el-table-column>
      <el-table-column prop="email" label="Email" />
    </el-table-column>
    <el-table-column label="Chronology">
      <el-table-column label="Created">
        <template #default="scope">
          {{ daysAgo(scope.row.created_at) }}
        </template>
      </el-table-column>
    </el-table-column>
    <el-table-column width="70">
      <template #header>
        <div class="text-center">Status</div>
      </template>
      <template #default="scope">
        <div class="text-center">
          <el-tooltip
            content="Deleted"
            placement="left"
            v-if="scope.row.deleted_at"
          >
            <span class="pi pi-times text-red-500" />
          </el-tooltip>
          <el-tooltip content="Active" placement="left" v-else>
            <span class="pi pi-check text-green-600" />
          </el-tooltip>
        </div>
      </template>
    </el-table-column>
    <el-table-column width="130">
      <template #header>
        <div class="text-center">Actions</div>
      </template>
      <template #default="scope">
        <div class="join w-full">
          <Link
            :href="route('users.edit', scope.row)"
            :disabled="scope.row.deleted_at"
            class="btn join-item"
            modal
          >
            <span class="pi pi-user-edit"></span>
          </Link>

          <Link
            v-if="!scope.row.deleted_at"
            class="btn join-item"
            :href="route('users.destroy', scope.row)"
            method="delete"
            preserve-scroll
            confirm
          >
            <span class="pi pi-trash"></span>
          </Link>
          <Link
            :href="route('users.restore', scope.row)"
            class="btn join-item"
            v-else
          >
            <span class="pi pi-refresh"></span>
          </Link>
        </div>
      </template>
    </el-table-column>
  </el-table>
</template>

<style scoped></style>
