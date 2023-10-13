import {Header3} from "@/Components/Typography/Headers";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";

export default function TableHeader({header, addRoute = '', addText = '', submit}: {
  header: string,
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
      {addText !== '' ? (
        <div className="ml-4 space-x-2">
          {addRoute !== undefined ? (
            <PrimaryButton href={addRoute}>
              {addText}
            </PrimaryButton>
          ) : (
            <PrimaryButton onClick={() => submit!()}>
              {addText}
            </PrimaryButton>
          )}
        </div>
      ) : null}
    </div>
  );
}
