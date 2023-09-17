export function useStorage() {
  /** --------------------------------------------
   * Returns the storage path for laravel's
   * file storage system
   *
   * @param value
   * @return {"/storage/"}
   */
  const storagePath = (value: string = ''): string => `/storage/${value}`

  return { storagePath }
}
