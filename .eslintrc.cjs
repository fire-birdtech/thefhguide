module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
    "extends": [
        "standard-with-typescript",
        "plugin:react/recommended"
    ],
    "ignorePatterns": ["resources/js/__tests__/**"],
    "overrides": [
        {
            "env": {
                "node": true
            },
            "files": [
                ".eslintrc.{js,cjs}"
            ],
            "parserOptions": {
                "sourceType": "script"
            }
        }
    ],
    "parserOptions": {
        "ecmaVersion": "latest",
        "sourceType": "module"
    },
    "plugins": [
        "react"
    ],
    "rules": {
        "@typescript-eslint/no-dynamic-delete": "warn",
        "@typescript-eslint/prefer-optional-chain": "warn",
        "array-callback-return": "warn",
        "react/react-in-jsx-scope": "off",
        "multiline-ternary": "off",
    },
    "settings": {
        "react": {
            "version": 'detect',
        },
    }
}
