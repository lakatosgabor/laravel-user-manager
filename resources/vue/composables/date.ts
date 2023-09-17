import relativeTime from 'dayjs/plugin/relativeTime'
import dayjs from 'dayjs'

export function useDate() {
  /** --------------------------------------------
   * Formats a laravel date and returns it in the
   * `days ago` format
   *  - EG: (Posted: 12 minutes ago)
   *
   * @param value
   *
   * @returns {string}
   */
  const daysAgo = (value: string): string => {
    dayjs.extend(relativeTime)
    return dayjs(value).fromNow()
  }

  /** --------------------------------------------
   * Return a formatted date from a laravel approved
   * format
   *
   * @param value
   * @param format
   *
   * @returns {string}
   */
  const fromLaravel = (value: string, format = null): string =>
    dayjs(value).format(format ?? 'dddd MMM DD, YYYY h:mm A')

  /**
   * Converts a date into a laravel approved format
   *
   * @param value
   *
   * @returns {string}
   */
  const toLaravel = (value: string): string =>
    dayjs(value).format('YYYY-mm-DD h:mm:ss')

  /**
   * Returns the current year
   *
   * @returns {number}
   */
  const year: number = new Date().getFullYear()

  return {
    fromLaravel,
    toLaravel,
    daysAgo,
    year,
  }
}
