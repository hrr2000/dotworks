
/**
 *
 * @param stateObjectString object of the service state {name: 'complete', text: 'Published'}
 * @returns {string}
 */
export function StateBadge(stateObjectString) {
    const stateObject = typeof stateObjectString === 'string' ? JSON.parse(stateObjectString) : stateObjectString;
    return `
        <span class="state-badge state-badge--${stateObject.name}">${stateObject.text}</span>
    `;
}
