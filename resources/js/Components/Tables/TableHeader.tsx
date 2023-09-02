import {Header3} from "@/Components/Typography/Headers";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";

export default function TableHeader({ header, addLink = '', addRoute = '', addText = '', submit }: {
    header: string,
    addLink?: string,
    addRoute?: string,
    addText?: string,
    submit?: CallableFunction,
}) {
    return (
        <div className="sm:flex sm:items-center">
            <div className="sm:flex-auto">
                <Header3>
                    {header}
                </Header3>
            </div>
            <div className="ml-4 space-x-2">
                {addLink && addText ? (
                    <PrimaryButton href={addLink}>
                        {addText}
                    </PrimaryButton>
                ) : null}
                {addRoute ? (
                    <PrimaryButton onClick={submit}>
                        {addText}
                    </PrimaryButton>
                ): null}
            </div>
        </div>
    );
}
