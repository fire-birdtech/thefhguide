import logo from '../../logo-long.png';

export default function ApplicationLogo({ className }) {
  return <img className={`h-10 w-auto ${className}`} src={logo} alt="The Family History Guide Logo"/>;
}
