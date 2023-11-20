import {createContext, type PropsWithChildren, useContext, useReducer} from "react"
import {type MediaFile} from "@/types"

const MediaFilesContext = createContext(null)
const MediaFilesDispatchContext = createContext(null)

export function MediaFilesProvider({ children, initialFiles }: PropsWithChildren<{ initialFiles: MediaFile[] }>) {
  const [files, dispatch] = useReducer(filesReducer, initialFiles)

  return (
    <MediaFilesContext.Provider value={files}>
      <MediaFilesDispatchContext.Provider value={dispatch}>
        {children}
      </MediaFilesDispatchContext.Provider>
    </MediaFilesContext.Provider>
  )
}

export function useMediaFiles() {
  return useContext(MediaFilesContext)
}

function filesReducer() {}
