export const capitalize = (value: string): string => {
  return (value.charAt(0).toUpperCase() + value.slice(1)) as Capitalize<string>
}

export const listStyleAlpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']
