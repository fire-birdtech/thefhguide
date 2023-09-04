import { EditorProvider, FloatingMenu, BubbleMenu } from '@tiptap/react';
import StarterKit from '@tiptap/starter-kit';

const extensions = [StarterKit];

export default function ({activeColor, value}) {
    return (
        <EditorProvider extensions={extensions} content={value}>
            <FloatingMenu>This is a floating menu</FloatingMenu>
            <BubbleMenu>This is a bubble menu</BubbleMenu>
        </EditorProvider>
    );
}
