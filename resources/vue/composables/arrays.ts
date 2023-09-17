export function useArray() {
  /**
   * Do two arrays have matching keys?
   *
   * @param a {any[]} The first array
   * @param b {any[]} The second array
   */
  function equals(a: any[], b: any[]): boolean {
    return (
      Array.isArray(a) &&
      Array.isArray(b) &&
      a.length === b.length &&
      a.every((val, index) => val === b[index])
    )
  }

  const remove = (arr: any[], value: any) =>
    arr.filter((element) => element != value)

  return {
    remove,
    equals,
  }
}
